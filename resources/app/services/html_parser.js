import parse from "html-react-parser";

export const htmlParser = (html) => {
  if (!html) return;
  return parse(html);
};
