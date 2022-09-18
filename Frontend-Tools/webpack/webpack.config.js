const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const webpack = require('webpack');

module.exports = {
	entry: './index.js',
	output: {
		path: path.resolve(__dirname, 'dist'),
		filename: 'main.js',
		clean: true,
	},
	mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
	module: {
		rules: [
			{
				test: /\.m?(js|jsx)$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: [['@babel/preset-env', { targets: 'defaults' }]],
					},
				},
			},
		],
	},
	plugins: [
		new HtmlWebpackPlugin({ template: './index.html' }),
		new webpack.ProvidePlugin({
			React: 'react',
		}),
	],
	resolve: {
		extensions: ['', '.js', '.jsx'],
	},
	externals: {
		react: 'React',
	},
};
