<!-- PROJECT SHIELDS -->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]
[![Symfony][symfony-shield]][symfony-url]
[![PHP][php-shield]][php-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <!--<a href="https://github.com/Tim-Koertgen/modular-symfony-template">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>-->

<h3 align="center">Modular Symfony Application Template</h3>

  <p align="center">
    This template helps you to get started with the modular programming aproach within the Symfony framework
    <br />
    <a href="https://github.com/Tim-Koertgen/modular-symfony-template"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/Tim-Koertgen/modular-symfony-template/issues">Report Bug</a>
    ·
    <a href="https://github.com/Tim-Koertgen/modular-symfony-template/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

After struggling to find a modular symfony template I decided to create my own. I decided to split the application into 5 main parts: Backend, Client, Core, Frontend and Shared. Each layer has its own tasks.

### Backend

All your business logic should be located here. The backend layer is split into four layers

- Business
  - Contains the actual business logic (e.g. reader and writer) and the facade that will be used by other modules
- Communication
  - Contains backend controller, commands, plugins that will be used by other services
- Persistence
  - Contains entities and repositories
- Presentation
  - Contains templates for the backend UI

### Client

The client is the bridge between the backend and frontend layer. Clients should not implement any business logic at all

### Core

Currently, this is used for base classes.

### Frontend

For now, I am using Twig to render my frontend. You could theoretically replace this with any technology you would like to use. I have splitted my frontend into 2 layers:

- Communication
  - Contains frontend controllers. This could also be a REST API if you need one.
- Presentation
  - Contains templates for the frontend

### Shared

Shared contains classes that are used across the hole application like TransferObjects and Constants.

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

* [Symfony](https://symfony.com/)
* [Twig](https://twig.symfony.com/)
* [PHPDocker.io](https://phpdocker.io/)
* [EasyAdminBundle](https://symfony.com/bundles/EasyAdminBundle/current/index.html)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

All you need to do is install [Docker](https://docs.docker.com/get-docker/) and [Docker Compose](https://docs.docker.com/compose/install/).

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/Tim-Koertgen/modular-symfony-template.git
   ```
2. Start docker
   ```sh
   docker-compose up -d
   ```
3. Run doctrine migrations
   ```sh
   docker-compose exec php-fpm php bin/console d:m:m --no-interaction
   ```

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

You should be able to access the following two endpoints after your installation is finished:
- http://localhost:18000/team
- http://localhost:18000/admin

Adding a team in the backend UI will make it appear in the frontend. This is just a really simple example of how to build your modules to make them work together.

<!--_For more examples, please refer to the [Documentation](https://example.com)_-->
_Documentation is in progress_

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap

- [] Generate TransferObjects from XML schema files

See the [open issues](https://github.com/Tim-Koertgen/modular-symfony-template/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Tim Körtgen - [@SirPhoeniix](https://twitter.com/SirPhoeniix) - tim.koertgen@outlook.de

Project Link: [https://github.com/Tim-Koertgen/modular-symfony-template](https://github.com/Tim-Koertgen/modular-symfony-template)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
<!--## Acknowledgments

* []()
* []()
* []()

<p align="right">(<a href="#top">back to top</a>)</p>-->



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/Tim-Koertgen/modular-symfony-template.svg?style=for-the-badge
[contributors-url]: https://github.com/Tim-Koertgen/modular-symfony-template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/Tim-Koertgen/modular-symfony-template.svg?style=for-the-badge
[forks-url]: https://github.com/Tim-Koertgen/modular-symfony-template/network/members
[stars-shield]: https://img.shields.io/github/stars/Tim-Koertgen/modular-symfony-template.svg?style=for-the-badge
[stars-url]: https://github.com/Tim-Koertgen/modular-symfony-template/stargazers
[issues-shield]: https://img.shields.io/github/issues/Tim-Koertgen/modular-symfony-template.svg?style=for-the-badge
[issues-url]: https://github.com/Tim-Koertgen/modular-symfony-template/issues
[license-shield]: https://img.shields.io/github/license/Tim-Koertgen/modular-symfony-template.svg?style=for-the-badge
[license-url]: https://github.com/Tim-Koertgen/modular-symfony-template/blob/main/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/tim-körtgen
[symfony-shield]: https://img.shields.io/badge/Symfony-5.3-red.svg?style=for-the-badge
[symfony-url]: https://linkedin.com/in/tim-körtgen
[php-shield]: https://img.shields.io/badge/PHP-8.0-blue.svg?style=for-the-badge
[php-url]: https://linkedin.com/in/tim-körtgen