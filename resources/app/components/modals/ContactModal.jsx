import React from "react";

export default function ContactModal() {
  return (
    <div>
      <div classNameName="block relative">
        <div className="modal fade" id={`quickViewModalContact`} tabindex="-1">
          <div className="modal-dialog modal-dialog-centered">
            <div className="modal-content">
              <div className="modal-header">
                <h3>Contact US</h3>
                <button
                  type="button"
                  className="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                  style={{ marginRight: "10px" }}
                >
                  Close
                </button>
              </div>
              <div className="modal-body"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
