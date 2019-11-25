--
-- 資料表結構 `check_records`
--

CREATE TABLE `check_records` (
  `checkId` int(11) NOT NULL COMMENT '流水號',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者帳號',
  `itemId` int(11) NOT NULL COMMENT '商品代號(流水號)',
  `itemPrice` int(11) NOT NULL COMMENT '商品當時價格',
  `checkQty` tinyint(3) NOT NULL COMMENT '商品購買數量',
  `checkTotalPrice` int(11) NOT NULL COMMENT '商品購買總價',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='結帳資料表';

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `check_records`
--
ALTER TABLE `check_records`
  ADD PRIMARY KEY (`checkId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `check_records`
--
ALTER TABLE `check_records`
  MODIFY `checkId` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號';
COMMIT;
