import React from "react";

export default function TopFooter() {
  return (
    <div>
      <div className="footer-top-section section pt-100 pb-60">
        <div className="container">
          <div className="row">
            <div className="footer-widget col-lg-4 col-md-6 col-12 mb-40">
              <h5 className="widget-title">ABOUT THE STORE</h5>
              <p>
                There are many variations of passages of Lor available, but the
                majority have suffered alteration in some form, by injected
                humour, or randomised words which don't look even slightly
                believable
              </p>
            </div>

            <div className="footer-widget col-lg-3 col-md-6 col-12 mb-40">
              <h5 className="widget-title">CUSTOMER SERVICE</h5>
              <ul>
                <li>
                  <a href="#">Contact Us</a>
                </li>
                <li>
                  <a href="#">Returns & Refunds</a>
                </li>
                <li>
                  <a href="#">Terms & Conditions</a>
                </li>
                <li>
                  <a href="#">online store</a>
                </li>
              </ul>
            </div>

            <div className="footer-widget col-lg-2 col-md-6 col-12 mb-40">
              <h5 className="widget-title">PROFILE</h5>
              <ul>
                <li>
                  <a href="#">my Account</a>
                </li>
                <li>
                  <a href="#">Checkout</a>
                </li>
                <li>
                  <a href="#">help</a>
                </li>
                <li>
                  <a href="#">support</a>
                </li>
              </ul>
            </div>

            <div className="footer-widget col-lg-3 col-md-6 col-12 mb-40">
              <h5 className="widget-title">SIGN UP FOR OUR AWESOME NEWS</h5>
              <form
                action="/"
                method="post"
                id="mc-embedded-subscribe-form"
                name="mc-embedded-subscribe-form"
                className="sunscribe-form validate"
                target="_blank"
                novalidate
              >
                <div id="mc_embed_signup_scroll">
                  <label for="mce-EMAIL" className="d-lg-none">
                    Subscribe to our mailing list
                  </label>
                  <input
                    type="email"
                    value=""
                    name="EMAIL"
                    className="email"
                    id="mce-EMAIL"
                    placeholder="Email Address"
                    required
                  />

                  <div
                    style={{ position: "absolute", left: "-5000px" }}
                    aria-hidden="true"
                  >
                    <input
                      type="text"
                      name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef"
                      tabindex="-1"
                      value=""
                    />
                  </div>
                  <div className="clear">
                    <input
                      type="submit"
                      value="Subscribe"
                      name="subscribe"
                      id="mc-embedded-subscribe"
                      className="button"
                    />
                  </div>
                </div>
              </form>
              <div className="footer-social fix">
                <a href="#">
                  <i className="fa fa-facebook"></i>
                </a>
                <a href="#">
                  <i className="fa fa-twitter"></i>
                </a>
                <a href="#">
                  <i className="fa fa-instagram"></i>
                </a>
                <a href="#">
                  <i className="fa fa-pinterest"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
