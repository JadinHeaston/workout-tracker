# Workout Tracker

It tracks your workouts. That's it. That's the pitch.

## Deployment

Docker Compose is the recommended way to deploy the application.  
I will eventually host a proper [dockerhub](https://hub.docker.com/) image, but Docker Compose is easier (and more familiar) to maintain for now.

1. Utilize the [Docker Compose file](docker-compose.yml)
2. Copy `./.env` to `./.env` and edit as necessary (**WIP**)
3. Copy `./includes/config.example.php` to `./includes/config.php` and edit as necessary.

## Development

### Build

Singular Build: `npm run build`

- Dev build 
	- `tsc --watch`  
	- `npx tailwindcss -i ./css/tailwind.css -o ./css/tailwind_output.css --watch`

### The Stack

[PHP](https://www.php.net/) + [HTMX](https://htmx.org/) + [TailwindCSS](https://tailwindcss.com/) + [MariaDB](https://mariadb.com/)  
(Plus [NGINX](https://nginx.org/) as a reverse proxy.)  
(and [phpMyAdmin](https://www.phpmyadmin.net/) for ease of development.)  

## Future Plans


1. Make the application. :|
2. ???
3. Profit? (I don't believe in this step)

