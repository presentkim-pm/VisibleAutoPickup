# Changelog

## 2.0.0 (2026-11-27)

The Poggit plugin version for the original [pmmp/PocketMine-MP](https://github.com/pmmp/PocketMine-MP) 5.x is kept on the
[`legacy/pmmp-5.44`](https://github.com/presentkim-pm/visibleautopickup/tree/legacy/pmmp-5.44) branch.

### ⚠️ Breaking changes
- Targets [axolotl-pm/PocketMine-MP](https://github.com/axolotl-pm/PocketMine-MP) `5.51` (BedrockProtocol 64,
  Bedrock `1.26.60`) and **PHP 8.4+**.
- Distributed as a phar from GitHub Releases instead of Poggit.

### 🔄 Changes
- Bundles [presentkim/remove-plugin-data-folder](https://packagist.org/packages/presentkim/remove-plugin-data-folder) `^2.0` through Composer instead of the Poggit virion.
- `composer.json` added (Composer is only used for development, testing and bundling libraries); `plugin.yml` has
  `src-namespace-prefix`, and the source files moved from `src/kim/present/visibleautopickup/` to `src/`.

### 🐛 Fixes
- The delayed XP orb priority task did not check whether the owner player was already closed.
