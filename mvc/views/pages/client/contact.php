<main>
    <div class="index-header">
        <div class="bg-header">
            <h1 class="heading">Contact</h1>
            <div class="path">
                <a href="<?php echo _WEB_ROOT ?>" class="back-to-home">Home</a>
                <span>/</span>
                <span class="page">Contact</span>
            </div>
        </div>
    </div>

    <div class="contact-container">
        <div class="gg-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40044.063333192!2d144.92150171430717!3d-37.78365359518722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sus!4v1659706463866!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <ul class="contact-section row">
            <li class="contact-option col col-4">
                <div class="contact-option-icon">
                    <i class="fa-solid fa-phone"></i>

                </div>
                <div class="contact-option-content">
                    <h5>PHONE</h5>
                    <p>
                        <b>Toll-Free</b>
                        012 - 345 - 6789
                        <br />
                        <b>Fax</b>
                        012 - 345 - 6789
                    </p>
                </div>
            </li>
            <li class="contact-option col col-4">
                <div class="contact-option-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="contact-option-content">
                    <h5>EMAIL</h5>
                    <p>
                        mail@example.com<br />
                        support@example.com
                    </p>
                </div>
            </li>
            <li class="contact-option col col-4">
                <div class="contact-option-icon">
                    <i class="fa-solid fa-location-arrow"></i>
                </div>
                <div class="contact-option-content">
                    <h5>ADDRESS</h5>
                    <p>
                        No: 58 A, East Madison Street,<br />
                        Baltimore, MD, USA 4508
                    </p>
                </div>
            </li>
        </ul>

        <div class="contact-form">
            <h4 class="contact-title">
                Contact Form
            </h4>
            <form class="contact-form-input container" action="#" method="post">
                <div class="row">
                    <div class="col col-4 contact-col">
                        <input type="text" id="name" class="contact-name" placeholder="Name" value>
                        <p class="error error-name"></p>
                    </div>
                    <div class="col col-4 contact-col">
                        <input type="text" id="email" class="contact-email" placeholder="Email" value>
                        <p class="error error-email"></p>
                    </div>
                    <div class="col col-4 contact-col">
                        <input type="text" id="phone" class="contact-phone" placeholder="Phone" value>
                        <p class="error error-phone"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col contact-message">
                        <textarea name="message" id="form-message" rows="10" placeholder="How can we help you?"></textarea>
                        <p class="error error-message"></p>
                    </div>
                </div>
                <div class="button-submit">
                    <button type="submit" class="btn">Send</button>
                    <p class="success"></p>
                </div>
            </form>
        </div>
    </div>
</main>