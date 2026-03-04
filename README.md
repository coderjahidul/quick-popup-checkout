# Quick Popup Checkout

**Quick Popup Checkout** is a lightweight WordPress plugin designed to streamline the WooCommerce shopping experience. It allows customers to bypass the intermediate cart page and complete their purchase directly through a sleek, modern popup checkout modal.

## 🚀 Features

- **One-Click Buy**: Adds a "⚡Checkout" button to both Single Product pages and Product Loops (Shop/Archive pages).
- **AJAX Add to Cart**: Silently adds products to the cart without refreshing the page.
- **Seamless Popup**: Opens the checkout page in a clean, distraction-free modal using an iframe.
- **Distraction-Free Mode**: Automatically hides site headers/footers when the checkout is viewed inside the popup.
- **Responsive Design**: Works beautifully on mobile and desktop screens.
- **Subdirectory Support**: Intelligent URL handling for WordPress installations in subdirectories or custom permalink structures.

## 🛠️ Installation

1. Upload the `quick-popup-checkout` folder to your `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Ensure **WooCommerce** is installed and activated.
4. The "⚡Checkout" button will automatically appear next to your "Add to Cart" buttons.

## 📂 Technical Details

### Plugin Structure
- `quick-popup-checkout.php`: Main plugin logic, hooks, and AJAX handlers.
- `assets/qp-script.js`: Frontend logic for AJAX calls and modal management.
- `assets/qp-style.css`: Modern UI styling with blur effects and animations.

### Requirements
- **PHP**: 7.4 or higher
- **WordPress**: 5.8 or higher
- **WooCommerce**: 6.0 or higher
- **jQuery**: (Standard with WordPress)

## 🤝 Contribution

Contributions are welcome! If you have suggestions for new features or find any bugs, please feel free to open an issue or submit a pull request on the repository.

## 👤 Author
- **Md Jahidul Islam Sabuz**
- GitHub: [@coderjahidul](https://github.com/coderjahidul)

## 📄 License
This plugin is licensed under the GPLv2 or later.
