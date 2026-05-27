import type { NextApiRequest, NextApiResponse } from "next";
import axios from "axios";

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse,
) {
  if (req.method !== "DELETE") return res.status(405).end();
  const { id } = req.query;
  try {
    const response = await axios.delete(
      `${process.env.NEXT_PUBLIC_API_URL || "http://localhost:8000/api/v1"}/business-hours/${id}`,
    );
    if (response.status !== 200 && response.status !== 204) {
      return res
        .status(response.status)
        .json({ error: `Failed to delete business hour ${id}` });
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
