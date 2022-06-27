const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const FixStyleOnlyEntriesPlugin = require("webpack-fix-style-only-entries");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

// production モード以外の場合、変数 enabledSourceMap は true
// 本番環境のときはsoucemapを出力させない設定
const enabledSourceMap = process.env.NODE_ENV !== "production";

module.exports = {
  // エントリーポイントの設定
  entry: {
    // コンパイル対象のファイルを指定
    styles: path.resolve(__dirname, "../assets/scss/styles.scss"),
  },
  module: {
    rules: [
      // sassのコンパイル設定
      {
        test: /\.(sa|sc|c)ss$/, // 対象にするファイルを指定
        use: [
          {
            loader: MiniCssExtractPlugin.loader, // JSとCSSを別々に出力する
          },
          // ▼CSSをバンドルするためのローダー
          {
            loader: "css-loader",
            options: {
              // CSS内のurl()メソッドの取り込みを禁止
              url: false,
              // ソースマップの利用有無
              sourceMap: enabledSourceMap,
              // postcss-loader と sass-loader の場合は2を指定
              importLoaders: 2,
              // 0 => no loaders (default);
              // 1 => postcss-loader;
              // 2 => postcss-loader, sass-loader
            },
          },
          // ▼PostCSS（autoprefixer）のための設定
          {
            loader: "postcss-loader",
            options: {
              // PostCSS側でもソースマップを有効にする
              sourceMap: enabledSourceMap,
              postcssOptions: {
                // Autoprefixer+gridのベンダープレフィックスを有効化
                plugins: [require("autoprefixer")({ grid: true })],
              },
            },
          },
          // ▼Sass を CSS へ変換するローダー
          {
            loader: "sass-loader",
            options: {
              // ソースマップの利用有無 ファイルがないときはnpm run buildで生成される
              sourceMap: enabledSourceMap,
              sassOptions: {
                outputStyle: "expanded",
              },
            },
          },
          // 下から順にコンパイル処理が実行されるので、記入順序に注意
        ],
      },
    ],
  },
  target: ["web", "es5"], // ES5(IE11等)向けの指定
  plugins: [
    // 出力先のフォルダを一旦空に
    new CleanWebpackPlugin({
      // 対象ファイル指定
      cleanOnceBeforeBuildPatterns: [
        // 複数ある場合は配列で指定
        "**/*", // 出力フォルダ（output: で指定したパス）内のすべてのファイル
      ],
    }),
    new FixStyleOnlyEntriesPlugin(), // CSS別出力時の不要JSファイルを削除
    // CSSをJSにバンドルせず、別ファイルにわける
    new MiniCssExtractPlugin({
      // CSSの出力先
      filename: "css/[name].css", // 出力ファイル名を相対パスで指定（[name]にはentry:で指定したstylesが入る）
    }),
  ],
  // 監視（watch）対象から除外するファイル
  watchOptions: {
    ignored: ["/assets/images/", "/node_modules/"],
  },
  // webpack起動時にターミナルにオススメ情報がでるのを停止
  performance: { hints: false },
};
