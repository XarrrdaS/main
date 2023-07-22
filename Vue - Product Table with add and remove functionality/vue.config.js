module.exports = {
  devServer: {
    proxy: {
      '/database': {
        target: 'http://localhost:3000',
        changeOrigin: true
      }
    }
  }
};