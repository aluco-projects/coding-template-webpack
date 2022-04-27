# 手順

<font color="Red">※node のバージョンをまずは確認してください。
<br>このプロジェクトでは、安定版である v16.2.0 で開発する前提です</font>

1. ```
   node -v // v16.2.0であれば問題ない
   ```
2. ```
   git clone https://github.com/kyohei-dan/aluco-coding-template.git
   ```
3. `npm install -D` で package をインストール
   <br>※-D はローカルのみに node_module としてダウンロードできるオプション
4. `npm run watch` で webpack 起動 変更監視モード ※基本はこれで開発
5. `npm run build` で 本番モード webp が吐き出されるよ ※build はプロジェクト管理者が行います

---

# コーディングルール

- PC から制作する

---

## 対象ブラウザについて

- chrome 最新版
- FireFox 最新版
- Micro Soft Edge 最新版
- Safari 最新版
- IE11 対応不要

---

## ブレイクポイントについて

- 767px から SP サイズとする `@include global.mq(sp) { margin: f.sp((20 auto)); }`
- 320px までは表示崩れがないか確認する
- max-width は 1920px

---

## フォントについて

- PC 時は rem で表記 **※VW を使わない SP 時は VW 使用 OK**
- フォントファミリーは Google フォントを使用する

---

## 画像について

- **webp は `npm run build` コマンドで生成されるので作成する必要はありません**
- **.htaccess ファイルで webp を読み込む記述をしているので picture タグを記述する必要はありません**
- `assets/img/` に各ページの名前毎にディレクトリを切って配置 例:top や company など
- 「common」には共通パーツで使用する画像を配置
- 画像のファイル名の命名規則は以下のとおり
  - ロゴ →`logo_company.jpg`
  - 写真、図、イラスト →`pic_about.jpg`
  - アイコン →`ic_twitter.svg`
  - タイトル →`ttl_01.png`
  - 背景 →`bg_company.png`
  - ボタン →`btn_primary.png`
  - バナー →`bnr_pickup01.png`
  - テキスト →`txt_title.png`

---

## html について

- 画像(img タグ)の書き方 ※webp のための picture タグは不要

```
  <figure>
    <img src="" alt="" class="" width="" height="" loading="lazy" decoding="async">
  </figure>
```

---

## css について

- 必ず class を指定して class に対してスタイルをあてること
  <br>※パフォーマンスのためタグに直接指定は NG
- **\_index.scss** はエントリーポイントになっているのでファイル作成ごとに記述する
- `assets/scss/` 内にファイルを作成して記述
  - 各ページごとに pages フォルダにファイルを作成
- CSS のプロパティ順序は要素の外側から内側への視覚順で記載
  - [参考サイト](https://zenn.dev/web_tips/articles/f1167f4314dcb3)
    <br>
  - 例:CSS の順番参考

  ```
  .hoge {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    margin: 100px 0 0 0;
    padding: 50px 30px 10px 20px;
    width: 60vw;
    height: 100%;
    background-color: #fff;
    border-radius: 50px;
    font-size: 1.6rem;
    color: #000;
    font-weight: 900;
    font-family: var(--kiwimaru-font);
    text-decoration: none;
    letter-spacing: 1px;
    line-height: 1.7;
    cursor: pointer;
    transition: opacity 1s ease;
    }
  ```

- 使い回すコード(component)の場合、margin は margin 専用の class を付ける
  <br>
  `.p-about__card.p-margin-20 { margin: 20px; }`

- カラー定義は変数で管理

  - `assets/scss/global/\_variables.scss`

- クラス名は FLOCSS を採用　 [参考サイト](https://haniwaman.com/flocss/)
  <br>

```
class="c-navigation"
class="l-header__logo"
```

- コンポーネント（部品）はクラス名にプレフィックスとして component の c-を付与（ex. c-btn-red）

- ページ固有のスタイルは、`assets/scss/pages` 配下にページ専用の scss ファイルで定義。

  - クラス名にプレフィックスとして p-を付与（ex. p-about）

- SP 時は、px の数値を以下のように入力することで vw に変換できます
  <br>
  ※値は、デザインデータ（SP）の px 数値をそのままいれれば ok
  <br>
  ex.

  ```
  @include global.mq(sp) {
    .hoge {
      height: f.sp(44);
      margin: f.sp(10 0 20 0); // 複数指定も可
      width: calc(f.sp(100) + 10px); // これは不可
      width: f.sp(calc(100 + 100)); // これも不可
      }
    }
  ```

- `<div class="pc"></div>` pc 時表示、sp 時非表示
- `<div class="sp"></div>` pc 時非表示、sp 時表示

---

## js について

- **index.js** はエントリーポイントになっているのでファイル作成ごとに記述する
- `assets/js/modules` 内に各機能ごとにファイルを作成して記述
- JS のファイル名の命名規則は以下のとおり（属性＋要素）

  - `AppDrawerButton.js`
    - App = アプリケーション全体で共通の
    - DrawerButton = ドロワーボタン
  - `ArticleTabButton.js`
    - Article = 記事ページで使用する
    - TabButton = タブボタン

- 必要であればライブラリも同階層に配置（例：swipper とか）
- `assets/js/polyfill` 内に IE などに対応するためのファイルを記述
- JavScript と連動しているクラスには、クラス名にプレフィックスとして js-を付与。
  - ※こちらのクラスでスタイルは当てないこと `.is-bg-active` など is を使ってスタイルをあてる

---

## dist フォルダ について

- git の追跡から除外しています
- webpack で本番用に最適化したファイルを出力しているフォルダ ※基本的に触らない
- `npm run build` で dist フォルダ内のファイルにあるコードが Minify(コード圧縮)されます
- 基本的にこちらのファイルに出力されたファイルを読み込ませています

---

## commit ルール について

- コミット文を以下のように完結に表現する
  <br>※コミットは追加や修正、削除など細かい粒度で行う 複数のタスクが混ざっているコミットは NG

  - コミットの種別を英単語の動詞で示す

        - `[Fix] (バグやミスの) 修正`
        - `[Add] (ファイルや機能の) 追加`
        - `[Remove] (コードやファイルの) 削除`
        - `[Change] (コードやファイルの) 仕様変更`
        - `[Update] (Fixではないコードや機能の) 修正改善`
        - `[Upgrade] (パッケージやドキュメントなどの) 更新`
        - `[Revert] 変更取り消し`

    <br>

```
  git commit -m "[Fix] headerが追従しない不具合を修正"
```

- gitmoji も使って ok
  - ✨ `feat`: 〜 機能の追加・実装新機能っぽいものの原型が出来たときにこれでコミットする
  - 📝 `docs`: 〜 ドキュメントのみの変更処理に直接関係のないテキストやコメントアウト、README などの追加・更新
  - 🎨 `style`: 〜 UI やデザイン関連の変更やコード上のセミコロン云々など
  - ♻️ `refac`: 〜 仕様や機能に影響がないコードの改善(リファクタリング)
  - 🩹 `fix`: 〜 軽微な問題の修正やちょっとしたエラーの解決などはこれでコミット、typo の修正もこれにあたります
  - 🐛 `bug`: 〜 バグの修正 「バグ」は正式運用後に出てきた問題に対してかな
  - 🚧 `work`: 〜 コーディングや上記に含まれない作業など
    <br>
    新機能実装までのコード書きなど。もくもくとコーディングをしている（コミットとしてはコレが一番多くなる）
    <br>
    ライブラリの追加や更新、削除等もここ
    <br>
    .gitignore ファイルの更新等もここ

---
