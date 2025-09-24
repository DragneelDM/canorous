"use client";
import React from "react";
import { PinContainer } from "@components/3d-pin.js";

export function Unreal() {
  return (
    <div className="h-[40rem] w-full flex items-center justify-center ">
      <PinContainer title="See" href="#">
        <div className="flex basis-full flex-col p-4 tracking-tight text-slate-100/50 sm:basis-1/2 w-[20rem] h-[20rem]">
          <h3 className="max-w-xs !pb-2 !m-0 font-bold text-base text-slate-100">
            {/* optional heading text */}
          </h3>
          <div className="text-base !m-0 !p-0 font-normal">
            <span className="text-slate-500 ">
              {/* optional subtitle text */}
            </span>
          </div>

          {/* ✅ Replace gradient block with video */}
          <video
            src="public\videos\VR_Headset.mp4"
            autoPlay
            loop
            muted
            playsInline
            className="flex flex-1 w-full rounded-lg mt-4 object-cover"
          />
        </div>
      </PinContainer>

    </div>
  );
}
