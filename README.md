# Installation

Add repository to root composer.json (it's not on packagist.org, yet)

```
	"repositories": [
		{
			"type": "git",
			"url": "https://github.com/TYPO3incubator/configuration.git"
		}
	],
```

After that it's possible to require according package

```
composer require typo3/cms-configuration:10.0.\*@dev
```
