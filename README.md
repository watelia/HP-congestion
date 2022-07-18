# HP-congestion(HPに混雑表示するやつ)

イキった名前してます。

店舗のウェブサイトやらなんやらに混雑状況を表示させるシステムを設計しました。
実際にアミューズメントのHPで運用が今後される見込み（2022/06/11現在）

`input.php`の入力結果をDBに保存して，その結果に応じた表示を`output.php`に出力します。

## 概要

`input.php`を開くと，６つのボタンがなんでいますので，混雑状況に応じてガラガラなら０，ギュウギュウなら５と入力してください。

`output.php`に入力結果に応じた表示がされるはずです。

mySQLでDBが少なくとも必要

### 補足

具体性の低い説明でごめんなさい

## 文責

* 作成者　watelia
