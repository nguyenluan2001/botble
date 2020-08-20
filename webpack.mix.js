let glob = require('glob');

glob.sync('./platform/**/*/webpack.mix.js').forEach(item => require(item));
