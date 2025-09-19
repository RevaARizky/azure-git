import { describe, test, expect } from 'vitest'
import {JSDOM} from "jsdom"
import { stripScrollHandler, initStrip } from './src/js/anim' // adjust path if needed
import { describe, it, expect, vi, beforeEach } from 'vitest';

const buildGradient = vi.fn();

const dom = new JSDOM('<!DOCTYPE html>')
const document = dom.window.document
const el = document.createElement('div')

// describe('stripScrollHandler', () => {
//     // test('progress = 0: only first strip starts at original', () => {
//     //     const strips = initStrip(el, 13)
//     //     const afterScroll = stripScrollHandler(0, strips).strips
        
//     //     expect(afterScroll[0][0]).toBeCloseTo(0)
//     //     for (let i = 1; i < strips.length; i++) {
//     //         const expected = afterScroll[i][1] - (100 / strips.length)
//     //         expect(afterScroll[i][0]).toBeCloseTo(expected)
//     //     }
//     // })

//     // test('progress = 1: all strips fully filled', () => {
//     //     const strips = initStrip(el, 13)
//     //     const afterScroll = stripScrollHandler(1, strips).strips

//     //     for (let i = 0; i < strips.length; i++) {
//     //         expect(afterScroll[i][0]).toBeCloseTo(afterScroll[i][1])
//     //     }
//     // })

//     // test('progress = 0.5: middle strips filled accordingly', () => {
//     //     const strips = initStrip(el, 13)
//     //     const afterScroll = stripScrollHandler(0.5, strips).strips

//     //     const current = Math.floor(0.5 * 13) // 6
//     //     const segmentSize = 100 / 13

//     //     for (let i = 0; i < current; i++) {
//     //         expect(afterScroll[i][0]).toBeCloseTo(afterScroll[i][1])
//     //     }
//     //     // current strip should be partially filled
//     //     expect(afterScroll[current][0]).toBeGreaterThan(afterScroll[current][1] - segmentSize)
//     //     expect(afterScroll[current][0]).toBeLessThanOrEqual(afterScroll[current][1])

//     //     // next strip (if triggerwed by breakpoint) might also be partially filled
//     //     const next = current + 1
//     //     if (next < strips.length) {
//     //         expect(afterScroll[next][0]).toBeLessThanOrEqual(afterScroll[next][1])
//     //     }
//     // })

//     // test('progress = 0.76: current and next few strips partially filled', () => {
//     //     const strips = initStrip(el, 13)
//     //     const afterScroll = stripScrollHandler(0.76, strips).strips

//     //     const current = Math.floor(0.76 * 13) // 9
//     //     const segmentSize = 100 / 13

//     //     for (let i = 0; i < current; i++) {
//     //         expect(afterScroll[i][0]).toBeCloseTo(afterScroll[i][1])
//     //     }

//     //     // current
//     //     expect(afterScroll[current][0]).toBeGreaterThan(afterScroll[current][1] - segmentSize)

//     //     // next strip might start based on remainder and breakpoint
//     //     expect(afterScroll[current + 1][0]).toBeGreaterThanOrEqual(afterScroll[current + 1][1] - segmentSize)
//     // })

//     test('progress = 0.3655913978494624', () => {
//         const strips = initStrip(el, 30)
//         const afterScroll = stripScrollHandler(0.3655913978494624, strips).strips

//         const current = Math.floor(0.3655913978494624 * 30)
//         const segmentSize = 100/30

//         for (let i=0; i < current; i++) {
//             expect(afterScroll[i][0]).toBeCloseTo(afterScroll[i][1])
//         }
//     })
//     test('progress = 0.3680727874276261', () => {
//         const strips = initStrip(el, 30)
//         const afterScroll = stripScrollHandler(0.3680727874276261, strips).strips

//         const current = Math.floor(0.3680727874276261 * 30)
//         const segmentSize = 100/30

//         for (let i=0; i < current; i++) {
//             expect(afterScroll[i][0]).toBeCloseTo(afterScroll[i][1])
//         }
//     })
// })


describe('Strip Animation Functions', () => {
    let mockElement;

    // Before each test, reset the mock element and the mock function's history.
    beforeEach(() => {
        mockElement = {
            style: {
                setProperty: vi.fn(),
            },
            // The strips array will be added by initStrip
        };
        vi.clearAllMocks(); // Resets call counts for buildGradient
    });

    describe('initStrip', () => {
        it('should create a strips array with the correct length', () => {
            initStrip(mockElement, 10);
            expect(mockElement.strips).toBeInstanceOf(Array);
            expect(mockElement.strips.length).toBe(10);
        });

        it('should calculate the start and end percentages correctly', () => {
            initStrip(mockElement, 10);
            // First strip should be [0, 10]
            expect(mockElement.strips[0][0]).toBeCloseTo(0);
            expect(mockElement.strips[0][1]).toBeCloseTo(10);
            // Last strip should be [90, 100]
            expect(mockElement.strips[9][0]).toBeCloseTo(90);
            expect(mockElement.strips[9][1]).toBeCloseTo(100);
        });

        it('should call buildGradient once with the initialized strips', () => {
            initStrip(mockElement, 10);
            expect(buildGradient).toHaveBeenCalledTimes(1);
            expect(buildGradient).toHaveBeenCalledWith(mockElement, mockElement.strips);
        });
    });

    describe('stripScrollHandler', () => {
        beforeEach(() => {
            // Initialize the element with 10 strips before each handler test
            initStrip(mockElement, 10);
            // Clear the initStrip call to buildGradient so we only count the handler's call
            vi.clearAllMocks();
        });

        it('should log an error if the element is not initialized', () => {
            const consoleSpy = vi.spyOn(console, 'error').mockImplementation(() => {});
            const uninitializedElement = {};
            stripScrollHandler(0.5, uninitializedElement);
            expect(consoleSpy).toHaveBeenCalledWith("Element is not initialized. Run initStrip(el) first.");
            consoleSpy.mockRestore();
        });

        it('should have all strips fully masked at progress 0', () => {
            stripScrollHandler(0, mockElement);
            expect(buildGradient).toHaveBeenCalledTimes(1);

            const stripsArg = buildGradient.mock.calls[0][1];
            // At progress 0, the calculated start should equal the initial start.
            expect(stripsArg[0][0]).toBeCloseTo(0); // First strip starts at 0
            expect(stripsArg[1][0]).toBeCloseTo(10); // Second strip starts at 10
            expect(stripsArg[9][0]).toBeCloseTo(90); // Last strip starts at 90
        });

        it('should have all strips fully revealed at progress 1', () => {
            stripScrollHandler(1, mockElement);
            expect(buildGradient).toHaveBeenCalledTimes(1);

            const stripsArg = buildGradient.mock.calls[0][1];
            // At progress 1, the calculated start should equal the initial end.
            stripsArg.forEach((strip, i) => {
                const segmentSize = 10;
                const expectedEnd = (i + 1) * segmentSize;
                expect(strip[0]).toBeCloseTo(expectedEnd);
            });
        });

        it('should calculate intermediate states correctly at progress 0.5', () => {
            stripScrollHandler(0.5, mockElement);
            expect(buildGradient).toHaveBeenCalledTimes(1);

            // With 10 strips, progress 0.5 means virtualProgress is 5.
            const stripsArg = buildGradient.mock.calls[0][1];

            // Strips before index 4 should be fully revealed
            expect(stripsArg[3][0]).toBeCloseTo(40); // strip 3 ends at 40

            // Strip 5 (i=5) is actively animating.
            // animationStart = 5 * 0.8 = 4.
            // animationEnd = 5.
            // revealProgress = (5 - 4) / (5 - 4) = 1. So it should be fully revealed.
            expect(stripsArg[5][0]).toBeCloseTo(60);

            // Strip 6 (i=6) is also animating.
            // animationStart = 6 * 0.8 = 4.8.
            // animationEnd = 5.8.
            // revealProgress = (5 - 4.8) / (5.8 - 4.8) = 0.2
            // newStart = 60 + 0.2 * 10 = 62
            expect(stripsArg[6][0]).toBeCloseTo(62);

            // Strip 8 should not have started yet.
            // animationStart = 8 * 0.8 = 6.4. virtualProgress (5) < animationStart.
            expect(stripsArg[8][0]).toBeCloseTo(80);
        });
    });
});
