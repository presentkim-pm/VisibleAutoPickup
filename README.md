<!-- PROJECT BADGES -->
<div align="center">

[![Poggit CI][poggit-ci-badge]][poggit-ci-url]
[![Poggit Version][poggit-version-badge]][poggit-release-url]
[![Poggit Downloads][poggit-downloads-badge]][poggit-release-url]
[![Stars][stars-badge]][stars-url]
[![License][license-badge]][license-url]

</div>


<!-- PROJECT LOGO -->
<br />
<div align="center">
  <img src="https://raw.githubusercontent.com/presentkim-pm/VisibleAutoPickup/main/assets/icon.png" alt="Logo" width="80" height="80">
  <h3>VisibleAutoPickup</h3>
  <p align="center">
    An plugin that automatically picks up items before others pick them up!

[View in Poggit][poggit-ci-url] · [Report a bug][issues-url] · [Request a feature][issues-url]

  </p>
</div>


<!-- ABOUT THE PROJECT -->
## About The Project
![Project Preview][project-preview]  

In the event of a block being destroyed, it is appropriate for the player who broke it to have priority for the item.
If you want to prevent the theft of others' items in mines or the wilderness, but do not wish to prohibit looting altogether, consider allowing players to pick up items first without banning the act of looting itself!

> Primarily useful to prevent others from coming near and stealing mined items.

:heavy_check_mark: Owner player automatically pick up items at after 0.5 sec(`10 ticks`).
:heavy_check_mark: If the owner player cannot pick it up, it can picked up by others after 1 sec(`20 ticks`).


-----

## Target software:
This plugin officially only works with [`Pocketmine-MP`](https://github.com/pmmp/PocketMine-MP/).

-----

## Installation
1) Download `.phar` from [Poggit release][poggit-release-url]
2) Move downloaded `.phar` file to server's **/plugins/** folder
3) Restart the server

-----

## Downloads
> **All released versions [here][poggit-release-url]**

> **All built versions [here][poggit-ci-url]**

-----

## License
Distributed under the **LGPL 3.0**. See [LICENSE][license-url] for more information


[poggit-ci-badge]: https://poggit.pmmp.io/ci.shield/presentkim-pm/VisibleAutoPickup/VisibleAutoPickup?style=for-the-badge
[poggit-version-badge]: https://poggit.pmmp.io/shield.api/VisibleAutoPickup?style=for-the-badge
[poggit-downloads-badge]: https://poggit.pmmp.io/shield.dl.total/VisibleAutoPickup?style=for-the-badge
[stars-badge]: https://img.shields.io/github/stars/presentkim-pm/VisibleAutoPickup.svg?style=for-the-badge
[license-badge]: https://img.shields.io/github/license/presentkim-pm/VisibleAutoPickup.svg?style=for-the-badge

[poggit-ci-url]: https://poggit.pmmp.io/ci/presentkim-pm/VisibleAutoPickup/VisibleAutoPickup
[poggit-release-url]: https://poggit.pmmp.io/p/VisibleAutoPickup
[stars-url]: https://github.com/presentkim-pm/VisibleAutoPickup/stargazers
[releases-url]: https://github.com/presentkim-pm/VisibleAutoPickup/releases
[issues-url]: https://github.com/presentkim-pm/VisibleAutoPickup/issues
[license-url]: https://github.com/presentkim-pm/VisibleAutoPickup/blob/main/LICENSE

[project-icon]: https://raw.githubusercontent.com/presentkim-pm/VisibleAutoPickup/main/assets/icon.png
[project-preview]: https://raw.githubusercontent.com/presentkim-pm/VisibleAutoPickup/main/assets/preview.gif
