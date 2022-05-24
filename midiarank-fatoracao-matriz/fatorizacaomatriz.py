import json
from math import sqrt
import numpy as np
import pandas as pd
import operator

def matrix_factorization(R, P, Q, K, steps=5000, alpha=0.0002, beta=0.02):
    '''
    R: rating matrix
    P: |U| * K (User features matrix)
    Q: |D| * K (Item features matrix)
    K: latent features
    steps: iterations
    alpha: learning rate
    beta: regularization parameter'''
    Q = Q.T

    for step in range(steps):
        for i in range(len(R)):
            for j in range(len(R[i])):
                if R[i][j] > 0:
                    # calculate error
                    eij = R[i][j] - np.dot(P[i,:],Q[:,j])

                    for k in range(K):
                        # calculate gradient with a and beta parameter
                        P[i][k] = P[i][k] + alpha * (2 * eij * Q[k][j] - beta * P[i][k])
                        Q[k][j] = Q[k][j] + alpha * (2 * eij * P[i][k] - beta * Q[k][j])

        eR = np.dot(P,Q)

        e = 0

        for i in range(len(R)):

            for j in range(len(R[i])):

                if R[i][j] > 0:

                    e = e + pow(R[i][j] - np.dot(P[i,:],Q[:,j]), 2)

                    for k in range(K):

                        e = e + (beta/2) * (pow(P[i][k],2) + pow(Q[k][j],2))
        # 0.001: local minimum
        if e < 0.001:

            break

    return P, Q.T

#main do script

with open("C:\\midiarank\\storage\\app\\avaliacoes.json") as json_file:

    print("Processando... aguarde !")

    avaliacoes = json.load(json_file)
    #print("Type:", type(avaliacoes)) #tipo do json é uma lista
    #print(avaliacoes)

    df = pd.read_json (r"C:\\midiarank\\storage\\app\\avaliacoes.json")
    #df.to_csv (r'C:\\midiarank\\storage\\app\\avaliacoesFilmes.csv', index = None)
    print("Dataset midiarank \n {}".format(df))

    totalUsers = df[df.columns[-2]][0]
    totalMidias = df[df.columns[-3]][0]

    espacoVetorial = []

    for i in range(df[df.columns[-2]][0]):
        b = np.zeros(df[df.columns[-3]][0])
        espacoVetorial.append(b)

    espacoVetorial = np.asarray(espacoVetorial) # vetores todos zerados

    idUsuarioLogado = 0
    vetorUsuarioLogado = []
    for index, row in df.iterrows():
        aux = espacoVetorial[row['idUsuario']-1]
        aux[row['idMidia']-1] = row['avaliacao']
        idUsuarioLogado = row['idUsuarioLogado']

    #print(espacoVetorial)

    vetorUsuarioLogado = np.asarray(espacoVetorial[idUsuarioLogado-1])
    
    #print("Fatoracao de matriz")

    '''R = [

         [5,3,0,1,3],

         [4,0,0,1,0],

         [1,1,0,5,2],

         [1,0,0,4,1],

         [0,1,0,4,0],

         [2,5,0,0,3],

         [3,3,5,0,2],

         [0,0,0,4,0],
             
        ]

    R = np.array(R)
    print(R)'''
    R = espacoVetorial
    # N: num of User
    N = len(R)
    # M: num of Movie
    M = len(R[0])
    # Num of Features
    K = 3

    P = np.random.rand(N,K)
    Q = np.random.rand(M,K)

    nP, nQ = matrix_factorization(R, P, Q, K)

    nR = np.dot(nP, nQ.T)

    # Create the dataframe
    df = pd.DataFrame(nR)
    #print(df) # matriz ja calculada!
    #print(df.iloc[[idUsuarioLogado-1]]) # array com as recomendações para o usuário logado no mídiaRank

    vetorCalculado = df.iloc[idUsuarioLogado-1].to_numpy()

    print(vetorUsuarioLogado)
    print(vetorCalculado)

    recomendacoes = {}

    '''if len(vetorCalculado):
        arrMenor = len(vetorCalculado)
    else:
        arrMenor = len(vetorUsuarioLogado)'''
    
    for i in range (len(vetorCalculado)):
        if vetorUsuarioLogado[i] == 0 and vetorCalculado[i] >= 3: # nota baixa por enquanto pq temos pouco votos mesmo e uma matriz muito esparsa
            #print("{} nota => {}".format(i+1,vetorCalculado[i]))
            recomendacoes[i+1] = vetorCalculado[i]

    print(recomendacoes)
    recomendacoes = np.fromiter(dict( sorted(recomendacoes.items(), key=operator.itemgetter(1),reverse=True)).keys(), dtype=int)
    #print(recomendacoes[:15])

    fileName = "recomendacoes_usuario_logado_" + str(idUsuarioLogado) + ".txt"
    file = open('C:\\midiarank\\storage\\app\\' + fileName, 'w') # abre esse diretorio e escreve nele 'w'

    for i in range(len(recomendacoes[:15])): # esse numero representa a quantidade de mídias que quero recomendar    
        file.write(str(recomendacoes[i])) # escreve efetivamente no arquivo
        file.write("\n")
        
    file.close() # fechar o arquivo

    print("processamento finalizado!")
