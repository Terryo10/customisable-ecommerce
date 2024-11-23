import { RouterProvider } from "react-router-dom";
import { BrowserRouter as Router } from "react-router-dom";
import RoutesAll from "./router";
import ToastNotifications from "@/components/ToastNotifications";
import AppProvider from "./providers/AppProvider";

function App() {
  return (
    <div className="block relative">
      <Router>
        <AppProvider>
          <RoutesAll />
        </AppProvider>
      </Router>
      {/* <RouterProvider router={router} /> */}
      <ToastNotifications />
    </div>
  );
}

export default App;
