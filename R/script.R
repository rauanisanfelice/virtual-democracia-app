#install.packages('caTools')
library(caTools)
#install.packages('e1071')
library(e1071)
#install.packages('caret')
library(caret)
#install.packages('kernlab')
library(kernlab)
#install.packages('RMySQL') # CONECTAR AO PHP MYSQL
#require(RMySQL)
library(RMySQL)

# CRIA CONEXAO AO BANCO
con <- dbConnect(RMySQL::MySQL(), host = "localhost",dbname="virtual_democracia",user = "root", password = "")
base <- dbReadTable(con, "questionario") #utilisateurs is a table from my database called extraction

#encode (todos os atributos categóricos)
base$id <- NULL
base$qts_02 <- NULL
base$qts_03 <- NULL
base$qts_05 <- NULL

base_processed = base
base_processed$qts_01 = factor(base_processed$qts_01, levels = c(1,2,3,4))
base_processed$qts_04 = factor(base_processed$qts_04, levels = c(0,1,2,3,4,5,6,7))
base_processed$qts_06 = factor(base_processed$qts_06, levels = c(1,2,3,4,5,6))
base_processed$qts_07 = factor(base_processed$qts_07, levels = c(1,2,3))
base_processed$qts_08 = factor(base_processed$qts_08, levels = c(1,2,3,4))
base_processed$qts_09 = factor(base_processed$qts_09, levels = c(1,2,3))
base_processed$qts_10 = factor(base_processed$qts_10, levels = c(0,1,2,3))
base_processed$qts_11 = factor(base_processed$qts_11, levels = c(1,2,3,4,5,6,7,8,9,10,11))

set.seed(32)

base_processed_sem <- subset(base_processed, !is.na(base_processed$qts_11))
base_processed_com <- subset(base_processed, is.na(base_processed$qts_11))

classidx <- ncol(base_processed_sem)
folds <- createFolds(base_processed_sem[,classidx],10,FALSE)

base_treino <-(base_processed_sem[folds!=3,])
base_teste <-(base_processed_sem[folds==3,])

#classificador Random Forest
classif_ksvm = ksvm(qts_11 ~ ., data = base_treino, kernel = "rbfdot", cost = 0)
prev_ksvm = predict(classif_ksvm, newdata = base_teste[-11])

matriz_confusao = table(base_teste$qts_11, prev_ksvm)
result_cm = confusionMatrix(matriz_confusao)

resumo_cm = result_cm$overall
acuracia_cm = round(resumo_cm['Accuracy'] * 100, digits = 2)

# PREVE O MELHOR CANDIDATO
prev_ksvm_result = predict(classif_ksvm, newdata = base_processed_com[-11])

print(acuracia_cm)
print(prev_ksvm_result)

##########################################################################################
# BEST
# Seed:  32 Fold:  3 Kernel: rbfdot Cost:  0 Acurácia:  68.97
##########################################################################################
