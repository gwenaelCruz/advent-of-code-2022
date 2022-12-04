# Advent of Code - 2022 Edition

![badge](./made-with-php.svg)

## About

The 2022 edition of the advent of code, my very first !

This event consists of 25 code challenges, one per day during december, similar to an advent calendar.
All challenges can be solved with the code of our choice.

I personally chose PHP 8.1 because it's my day-to-day work
language and also because I wanted to try the 8.1 features.

## Installation

Project is shipped with a Docker Compose file containing only a PHP 8.1 CLI image.

Run:
```bash
docker compose pull
```
to download the image. That's it, everything is ready !

## Run scripts

With the provided Docker image, run the following command:
```bash
docker compose run --rm php-cli php {day-of-your-choice}/{index/part1/part2}.php
```
