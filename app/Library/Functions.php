<?php

namespace App\Library;

class Functions {
  
    /**
     * カテゴリー名を表示する
     * 
     * @return view
     */
  public static function setCategoryName($category) {
    if ($category == 1) {
            return 'トップス';
          } elseif ($category == 2) {
            return 'アウター';
          } elseif ($category == 3) {
            return 'インナー';
          } elseif ($category == 4) {
            return 'ボトムス';
          } elseif ($category == 5) {
            return 'シューズ';
          } elseif ($category == 6) {
            return 'ビジネス';
          } else {
            return 'カテゴリーが存在しません';
          }
  }

    /**
     * 着用頻度を表示する
     * 
     * @return view
     */
  public static function setFrequencyName($frequency) {
    if ($frequency == 1) {
        return 'よく着る';
      } elseif ($frequency == 2) {
        return 'たまに着る';
      } elseif ($frequency == 3) {
        return 'あまり着ない';
      } elseif ($frequency == 4) {
        return '全然着ない';
      } else {
        return '存在しない値です。';
      }
}
}
