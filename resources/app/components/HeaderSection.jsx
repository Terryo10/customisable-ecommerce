import React from "react";
import { Link } from "react-router-dom";

export default function HeaderSection({ title }) {
  return (
    <div>
      <div class="page-banner-section section">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="page-banner-content">
                <h1>{title}</h1>
                <ul class="breadcrumb">
                  <li>
                    <Link to="/">Home</Link>
                  </li>
                  <li class="active">{title}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
