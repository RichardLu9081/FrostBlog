<?php

if (! function_exists('is_in_ranges')) {
    function is_in_ranges(int $value, string $ranges): int
    {
        // 将范围字符串按逗号分割成数组
        $rangeArray = explode(',', $ranges);

        foreach ($rangeArray as $range) {
            // 对每个范围进行处理，如果有短横杠，则进一步分割成起始和结束值
            $subRange = explode('-', trim($range));

            // 如果子范围只有一个值，直接比较
            if (count($subRange) == 1) {
                if ($value == intval($subRange[0])) {
                    return 1;
                }
            } 
            // 如果子范围有两个值，判断是否在范围内
            elseif (count($subRange) == 2) {
                $start = intval($subRange[0]);
                $end = intval($subRange[1]);

                if ($value >= $start && $value <= $end) {
                    return 1;
                }
            }
        }

        // 遍历完所有范围都没有找到匹配项，则返回0
        return 0;
    }
}