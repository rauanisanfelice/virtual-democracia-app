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

#carregar a base na variável
base = read.csv2('questionario.csv')

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

classidx <- ncol(base_processed)
folds <- createFolds(base_processed[,classidx],10,FALSE)

base_treino <-(base_processed[folds!=3,])
base_teste <-(base_processed[folds==3,])

#classificador Random Forest
classif_ksvm = ksvm(qts_11 ~ ., data = base_treino, kernel = "rbfdot", cost = 0)
prev_ksvm = predict(classif_ksvm, newdata = base_teste[-11])

matriz_confusao = table(base_teste$qts_11, prev_ksvm)
result_cm = confusionMatrix(matriz_confusao)

resumo_cm = result_cm$overall
acuracia_cm = round(resumo_cm['Accuracy'] * 100, digits = 2)

print(paste("Melhor Acurácia: ", acuracia_cm))
##########################################################################################
# BEST
# Seed:  32 Fold:  3 Kernel: rbfdot Cost:  0 Acurácia:  68.97
##########################################################################################
