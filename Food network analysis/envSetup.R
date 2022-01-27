sbsRecipes <- read.csv("../CSV/sbsRecipes.csv")
View(sbsRecipes)

uniqueRecipes <- unique(sbsRecipes$Dish.Name)
uniqueRecipes

uniqueIngredients <- unique(sbsRecipes$Ingredient)
uniqueIngredients

recipes <- list()

for(recipeName in uniqueRecipes){
  data <- split(sbsRecipes, sbsRecipes$Dish.Name == recipeName, drop = FALSE)
  recipes <- append(recipes, list(data))
}

ingredientCombinations <- data.frame(Ing1 = character(),
                                     Ing2 = character(),
                                     Occurrence = double())

for(ing1 in 1:length(uniqueIngredients)){
  for(ing2 in 1:length(uniqueIngredients)){
    ing2 = ing1 + 1 
    ingredientCombinations[nrow(ingredientCombinations) + 1,] = c(uniqueIngredients[ing1], uniqueIngredients[ing2], 0)
  }
}


View(ingredientCombinations)
