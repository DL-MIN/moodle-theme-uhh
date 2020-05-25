# Moodle Theme UHH

A Moodle theme based on current Boost version to match CI of Universität Hamburg slightly.

## Install

1.  Clone repository to your moodle path  
    ```
    $ git clone git@github.com:DL-MIN/moodle-theme-uhh.git /var/html/moodle/theme/uhh
    ```

2.  Change ownership, if required    
    ```
    $ chown -R www-data:www-data /var/html/moodle/theme/uhh
    ```


## Missing Files

A few files, mainly images and fonts, are not in the repository for legal reasons.
They are listed below:

-   **Favicon**  
    `/pix/favicon.ico`

-   **Fonts**  
    Change used or required fonts in `/scss/pre.scss` and upload your
    font files (e.g. *.eot, *.woff, *.woff2) to `/fonts/` directory.
    
    ```
    TheSansUHH-Bold.eot
    TheSansUHH-BoldItalic.eot
    TheSansUHH-BoldItalic.woff
    TheSansUHH-BoldItalic.woff2
    TheSansUHH-Bold.woff
    TheSansUHH-Bold.woff2
    TheSansUHH-Caps-Bold.eot
    TheSansUHH-Caps-Bold.woff
    TheSansUHH-Caps-Bold.woff2
    TheSansUHH-Caps-Lighter.eot
    TheSansUHH-Caps-Lighter.woff
    TheSansUHH-Caps-Lighter.woff2
    TheSansUHH-Caps-Regular.eot
    TheSansUHH-Caps-Regular.woff
    TheSansUHH-Caps-Regular.woff2
    TheSansUHH-Italic.eot
    TheSansUHH-Italic.woff
    TheSansUHH-Italic.woff2
    TheSansUHH-Regular.eot
    TheSansUHH-Regular.woff
    TheSansUHH-Regular.woff2
    ```
