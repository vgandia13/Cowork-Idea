import type { NextApiRequest, NextApiResponse } from "next";
import axios from "axios";
import { BusinessHours } from "@/types/BusinessHours";

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse,
) {
  if (req.method !== "POST") return res.status(405).end();
  try {
    const response = await axios.post<BusinessHours>(
      `${process.env.NEXT_PUBLIC_API_URL || "http://localhost:8080/api/v1"}/business-hours`,
      req.body as BusinessHours,
    );
    if (response.status !== 201) {
      return res
        .status(response.status)
        .json({ error: "Failed to create business hours" });
    }
    res.status(201).json(response.data);
  } catch (error) {
    if (error instanceof Error) {
      return res.status(500).json({ error: error.message });
    }

    if (axios.isAxiosError(error)) {
      return res
        .status(error.response?.status || 500)
        .json({
          error: error.response?.data?.message || "Error en la API externa",
        });
    }
  }
}
