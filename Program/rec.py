import requests
import pymysql
import pandas as pd
from pymysql import cursors
from requests.models import Response
from sklearn.feature_extraction.text import CountVectorizer
import psycopg2 as ps
from nltk.tokenize import word_tokenize

connection = pymysql.connect(host='localhost',
                         user='root',
                         password='',
                         db='phpdasar')

cursor=connection.cursor()

df = pd.read_csv("data/game.csv")

# print(df)

baris = df.shape[0]

from sklearn.metrics.pairwise import cosine_distances


class RecommenderSystem:
    def __init__(self, data, content_col):
        self.df = pd.read_csv(data)
        self.content_col = content_col
        self.encoder = None
        self.bank = None
        
    def fit(self):
        self.encoder = CountVectorizer(stop_words="english", tokenizer=word_tokenize)
        self.bank = self.encoder.fit_transform(self.df[self.content_col])
        
    def recommend(self, idx, topk=20):
        content = df.loc[idx, self.content_col]
        code = self.encoder.transform([content])
        dist = cosine_distances(code, self.bank)
        rec_idx = dist.argsort()[0, 1:(topk+1)]
        return self.df.loc[rec_idx]

recsys = RecommenderSystem("data/game.csv", content_col="genre")
recsys.fit()
# print(recsys.recommend(49))


# eksekusi rekomendasi

for x in range(baris):
    rec = recsys.recommend(x)
    print("Rec ke-"+str(x))
    print(rec)

for i in range(baris):
    cursor.execute("CREATE TABLE `"+str(i+1)+"`(rec_id INT AUTO_INCREMENT PRIMARY KEY, game_id INT(5), namagame VARCHAR(100), genre VARCHAR(100), deskripsi VARCHAR(1000), tahun CHAR(4), gambar VARCHAR(100), popular TINYINT(1), harga INT(20), usia TINYINT(1))")

y=0
for i in range(baris):
    rec = recsys.recommend(i)
    cols = "`,`".join([str(i) for i in rec.columns.tolist()])

    y=y+1
    for i,row in rec.iterrows():
        sql = "INSERT INTO `"+str(y)+"` (`" +cols + "`) VALUES (" + "%s,"*(len(row)-1) + "%s)"
        cursor.execute(sql, tuple(row))

        # the connection is not autocommitted by default, so we must commit to save our changes
        connection.commit()

print ("SUKSESSS !!!!!")