const path = require('path');
const webpack = require("webpack");
const Uglify = require("uglifyjs-webpack-plugin");

module.exports = {
  mode: 'production',	
  entry: './app.js',
  output: {
      path: path.resolve(__dirname, 'dist'),
      filename: 'bundle.js'
  },
  module:{
    rules: [

      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [ 'babel-loader' ]
      },

      {
        test: /\.css$/,
        use: [ 'style-loader', 'css-loader' ]
      }

    ]
  },
  plugins: [
 	new Uglify()
  ]
};
         