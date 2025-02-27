import { VirtualScroll } from "@virtual-scroll/core";

new VirtualScroll({
    element: ".long-list",
    itemHeight: 100,
    amount: 10,
});
