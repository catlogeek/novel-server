<?php

namespace App\Enums;

enum Genre: int
{
    case HighFantasy = 1;
    case LowFantasy = 2;
    case ScienceFiction = 3;
    case LoveStory = 4;
    case Romance = 5;
    case Drama = 6;
    case Horror = 7;
    case Mystery = 8;
    case Nonfiction = 9;
    case History = 10;
    case Criticism = 11;
    case Others = 12;
    case FanFiction = 99;

    public function display(): string
    {
        return match ($this) {
            self::HighFantasy => '異世界ファンタジー',
            self::LowFantasy => '現代ファンタジー',
            self::ScienceFiction => 'SF',
            self::LoveStory => '恋愛',
            self::Romance => 'ラブコメ',
            self::Drama => '現代ドラマ',
            self::Horror => 'ホラー',
            self::Mystery => 'ミステリー',
            self::Nonfiction => 'エッセイ・ノンフィクション',
            self::History => '歴史・時代・伝奇',
            self::Criticism => '創作論・評論',
            self::Others => '詩・童話・その他',
            self::FanFiction => '二次創作',
        };
    }
}
