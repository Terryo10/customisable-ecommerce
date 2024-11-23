import React from "react";
import { AppContext } from "../providers/AppProvider";

export default function Slider() {
  const { sliders } = React.useContext(AppContext);
  return (
    <div>
      <div className="home-slider-section section">
        <div id="home-slider" className="slides">
          {sliders?.map((slide) => (
            <>
              <img
                src={`/storage/${slide?.image}`}
                alt=""
                title={`#slider-caption-${slide?.id}`}
              />
            </>
          ))}
        </div>

        {sliders?.map((slide) => (
          <>
            <div
              id={`slider-caption-${slide?.id}`}
              className="nivo-html-caption"
            >
              <div className="container">
                <div className="row">
                  <div className="hero-slider-content col-sm-8 col-xs-12">
                    <h1
                      className="wow fadeInUp"
                      data-wow-duration="1s"
                      data-wow-delay="0.5s"
                    >
                      {slide?.title}
                    </h1>
                    <p
                      className="wow fadeInUp"
                      data-wow-duration="1s"
                      data-wow-delay="1s"
                    >
                      {slide?.description}{" "}
                    </p>
                    <a
                      href="#shop"
                      className="wow fadeInUp"
                      data-wow-duration="1s"
                      data-wow-delay="1.5s"
                    >
                      View Shop
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </>
        ))}
      </div>
    </div>
  );
}
