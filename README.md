<!-- PROJECT BADGES -->
<div align="center">

![Version][version-badge]
[![Stars][stars-badge]][stars-url]
[![License][license-badge]][license-url]

</div>


<!-- PROJECT LOGO -->
<br />
<div align="center">
  <img src="https://raw.githubusercontent.com/presentkim-pm/visibleautopickup/main/assets/icon.png" alt="Logo" width="80" height="80">
  <h3>VisibleAutoPickup</h3>
  <p align="center">
    A plugin that automatically picks up items and XP orbs before others pick them up! (axolotl-pm/PocketMine-MP 5.x)

[Contact to me][author-discord] · [Report a bug][issues-url] · [Request a feature][issues-url]

  </p>
</div>


<!-- ABOUT THE PROJECT -->

### Overview

It is appropriate for the player who destroys a block or kills an entity to have priority for the dropped item.
This plugin ensures that the owner player takes priority in picking up items and experience orbs.

![Project Preview][project-preview]

> Primarily useful to showcase the pickup action to other players, it's even better than instant-pickup plugins

- Owner player automatically picks up items after 0.5 sec (`10 ticks`).
- Owner player has a 1 sec (`20 ticks`) priority for XP orbs.
- Also works when killing entities.
- Does nothing in creative mode (players without finite resources).
- No commands, permissions or configuration.

---

### Installation & Requirements

- **Server**
  - [axolotl-pm/PocketMine-MP](https://github.com/axolotl-pm/PocketMine-MP) `5.51` or higher (`plugin.yml` `api: [5.51.0]`),
    which uses BedrockProtocol 64 (Bedrock `1.26.60`).
  - PHP `8.4` or higher.
- **Installation**
  - Download `VisibleAutoPickup.phar` from [GitHub Releases][releases-url] and place it into your server's `plugins` directory.
  - Restart the server; the plugin will load automatically according to `plugin.yml`.
- **Old versions**
  - The version for the original [pmmp/PocketMine-MP](https://github.com/pmmp/PocketMine-MP) `5.x` (up to `5.44`,
    Poggit releases) is kept on the [`legacy/pmmp-5.44`](https://github.com/presentkim-pm/visibleautopickup/tree/legacy/pmmp-5.44) branch.
- **Development**
  - `composer install` then `composer test` runs the PHPUnit tests.

---

### License

Distributed under the **LGPL 3.0**. See [LICENSE][license-url] for more information

-----

[author-discord]: https://discordapp.com/users/345772340279508993

[version-badge]: https://img.shields.io/github/v/release/presentkim-pm/visibleautopickup?display_name=tag&style=for-the-badge&label=VERSION

[release-badge]: https://img.shields.io/github/downloads/presentkim-pm/visibleautopickup/total?style=for-the-badge&label=GITHUB%20

[stars-badge]: https://img.shields.io/github/stars/presentkim-pm/visibleautopickup.svg?style=for-the-badge

[license-badge]: https://img.shields.io/github/license/presentkim-pm/visibleautopickup.svg?style=for-the-badge

[stars-url]: https://github.com/presentkim-pm/visibleautopickup/stargazers

[releases-url]: https://github.com/presentkim-pm/visibleautopickup/releases

[issues-url]: https://github.com/presentkim-pm/visibleautopickup/issues

[license-url]: https://github.com/presentkim-pm/visibleautopickup/blob/main/LICENSE

[project-icon]: https://raw.githubusercontent.com/presentkim-pm/visibleautopickup/main/assets/icon.png

[project-preview]: https://raw.githubusercontent.com/presentkim-pm/visibleautopickup/main/assets/preview.gif
