import { v4wp } from '@kucrut/vite-for-wp';

export default {
  plugins: [
    v4wp({
      input: 'src/js/main.js',
      outDir: 'dist',
    }),
  ],
};
