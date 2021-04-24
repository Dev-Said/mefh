module.exports = {
    "env": {
        "browser": true,
        "es2021": true
    },
    "extends": [
        "eslint:recommended",
        "plugin:react/recommended"
    ],
    "parserOptions": {
        "ecmaFeatures": {
            "jsx": true
        },
        "ecmaVersion": 12,
        "sourceType": "module"
    },
    "plugins": [
        "react"
    ],
    "settings": {
        "createClass": 'createReactClass',
        "pragma": 'React',
        "version": 'detect',
        "flowVersion": '0.53',
        'import/resolver': {
            "node": {
                "moduleDirectory": ['node_modules', 'src'],
            },
        },
    }
    ,
    "rules": {
        "react/jsx-uses-react": "error",
    },
    "parserOptions": {
        "ecmaFeatures": {
            "jsx": true
        },
        "sourceType": "module",
    }

};
