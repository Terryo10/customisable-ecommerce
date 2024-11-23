From node:18-alpine

WORKDIR /app

COPY package*.json .
COPY composer*.json .

RUN npm install
RUN composer install

COPY . .

EXPOSE 8000

CMD ["npm", "run dev"]

CMD ["cp", ".env.example .env"]