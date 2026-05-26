import type { NextApiRequest, NextApiResponse } from "next";
import axios from "axios";
import { BusinessHours } from "@/types/BusinessHours";

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse,
) {
  try {
    const response = await axios.get<BusinessHours[]>(
      `${process.env.NEXT_PUBLIC_API_URL || "http://localhost:8080/api/v1"}/business-hours`,
    );
    if (response.status !== 200) {
      return res
        .status(response.status)
        .json({ error: "Failed to fetch business hours" });
    }
    res.status(200).json(response.data);
  } catch (error) {
    if (axios.isAxiosError(error)) {
      return res
        .status(error.response?.status || 500)
        .json({
          error: error.response?.data?.message || "Error en la API externa",
        });
    }

    if (error instanceof Error) {
      return res.status(500).json({ error: error.message });
    }
  }
}
