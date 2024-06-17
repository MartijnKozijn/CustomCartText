![BannerCCT](https://github.com/MartijnKozijn/CustomCartText/assets/56151997/91196289-8f05-4eba-9332-d247f82a0fb4)

### CustomCartText Module

## Overview
The CustomCartText module for PrestaShop allows you to display custom text in the shopping cart modal. This can be useful for providing additional information to customers during their shopping experience.

## Features
- Display custom text in the cart modal.
- Easily update the custom text through the PrestaShop backoffice.
- Automatically registers the necessary hooks upon installation.

## Installation

1. **Download the Module:**
   - Clone or download this repository to your local machine.

2. **Upload the Module:**
   - Go to your PrestaShop backoffice.
   - Navigate to `Modules` > `Module Manager`.
   - Click on `Upload a module` and select the `customcarttext.zip` file or the directory containing the module files.

3. **Install the Module:**
   - After uploading, find the `Custom Cart Text` module in the list and click `Install`.

4. **Configure the Module:**
   - Once installed, click on `Configure` to set the custom text you want to display in the cart modal.

## Usage

1. **Setting Custom Text:**
   - Navigate to the `Modules` > `Module Manager`.
   - Find the `Custom Cart Text` module and click on `Configure`.
   - Enter the custom text you want to display in the cart modal and save the changes.

2. **Hook Placement:**
   - The module automatically registers the hooks needed to display the custom text in the cart modal.
   - To manually place the hook in a template, use:
     ```smarty
     {hook h='displayCustomCartText'}
     ```

## Future Plans

- **Multiple Placement Options:** Allow the custom text to be displayed in multiple predefined locations throughout the site, not just in the cart modal.
- **Backoffice Enhancements:** Add more customization options in the backoffice, such as text formatting and multiple text fields.
- **Multi-language Support:** Ensure the custom text can be translated into multiple languages.
- **Condition-based Display:** Enable displaying different texts based on cart conditions, such as cart total, number of items, or specific products.

## Contributing

1. **Fork the Repository:**
   - Click on the `Fork` button at the top right of this page to create a copy of this repository under your GitHub account.

2. **Clone the Repository:**
   - Clone your forked repository to your local machine using:
     ```bash
     git clone https://github.com/your-username/customcarttext.git
     ```

3. **Create a Branch:**
   - Create a new branch for your feature or bug fix using:
     ```bash
     git checkout -b feature-branch
     ```

4. **Make Changes:**
   - Make your changes to the code.

5. **Commit and Push:**
   - Commit your changes with a descriptive message using:
     ```bash
     git commit -m "Description of your changes"
     ```
   - Push your changes to your forked repository using:
     ```bash
     git push origin feature-branch
     ```

6. **Submit a Pull Request:**
   - Go to the original repository and click on `Pull Requests`.
   - Click on `New Pull Request` and select your branch to submit your pull request.

## Support
For support or any questions, please open an issue on this GitHub repository. We will do our best to help you as soon as possible.
