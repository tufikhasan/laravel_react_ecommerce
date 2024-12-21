import Navbar from "@/Components/App/Navbar";
import { PropsWithChildren } from "react";

export default function GuestLayout({ children }: PropsWithChildren) {
  return (
    <div className="min-h-screen bg-gray-100 dark:bg-gray-900">
      <Navbar />
      <div className="p-8">
        <div className="card bg-white shadow max-w-[420px] mx-auto">
          <div className="card-body">{children}</div>
        </div>
      </div>
    </div>
  );
}
