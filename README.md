# Telegram Scribd Downloader Bot

A Telegram bot that allows users to download documents from Scribd by simply sending the document link.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Setup](#setup)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Configuration](#configuration)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction

This Telegram bot is designed to facilitate document downloads from Scribd. Users can interact with the bot by sending Scribd document links, and the bot will provide them with downloadable links for the documents.

## Features

- Handles document download requests from Scribd links.
- Provides users with direct download links for documents.
- Sends notifications to admin when a document link is shared.
- Implements basic commands for user interaction.

## Setup

### Prerequisites

- PHP >= 5.6
- A web server (e.g., Apache, Nginx)
- A Telegram bot token obtained from BotFather

### Installation

1. Clone this repository to your server:

   ```bash
   git clone https://github.com/yourusername/telegram-scribd-downloader-bot.git
   ```

2. Navigate to the project directory:

   ```bash
   cd telegram-scribd-downloader-bot
   ```

### Configuration

1. Open the `config.php` file.
2. Replace `YOUR_TELEGRAM_BOT_TOKEN` with your actual Telegram bot token.
3. Update the `$admin` variable with your Telegram user ID.
4. Save and close the file.

## Usage

1. Start the bot by running the PHP script on your server:

   ```bash
   php bot.php
   ```

2. Interact with the bot on Telegram by sending Scribd document links. The bot will respond with download links for the documents.

## Contributing

Contributions are welcome! If you encounter any issues or have suggestions for improvements, feel free to open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
