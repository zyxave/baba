#include <cstdio>
#include <cstring>
#include <vector>
#include <utility>
#include <algorithm>
#include <cmath>

using namespace std;

int endPlace, budget;

vector< pair<int, int> > allRoute[101];
int cek[101];

int dp(int currentPlace, int totalCost){

	//printf("currentPlace %d  totalCost %d\n", currentPlace, totalCost);

	if (totalCost>budget){
		return 60001;
	}

	if (currentPlace==endPlace){
		return totalCost;
	}

	else if (cek[currentPlace]==-1 || cek[currentPlace]>totalCost){
		cek[currentPlace] = totalCost;

		int ans = 60001;

		for (int i=0; i<allRoute[currentPlace].size(); i++){
			ans = min(ans, dp(allRoute[currentPlace][i].first, totalCost+allRoute[currentPlace][i].second));
		}

		return ans;
	}

	return 60001;
}

int main(){

	int testcase;
	int startPlace, n;
	int placeA, placeB, price;

	scanf("%d", &testcase);

	for (int i=0; i<testcase; i++){

		memset(cek, -1, sizeof(cek));

		for (int j=0; j<=100; j++){
			allRoute[j].clear();
		}

		scanf("%d %d %d %d", &n, &startPlace, &endPlace, &budget);

		for (int j=0; j<n; j++){

			scanf("%d %d %d", &placeA, &placeB, &price);

			allRoute[placeA].push_back(make_pair(placeB, price));
			allRoute[placeB].push_back(make_pair(placeA, price));

			//printf("A %d  B %d  price %d   B %d  A %d  price %d\n", 
				//placeA, allRoute[placeA][allRoute[placeA].size()-1].first, allRoute[placeA][allRoute[placeA].size()-1].second, 
				//placeB, allRoute[placeB][allRoute[placeB].size()-1].first, allRoute[placeB][allRoute[placeB].size()-1].second);
		}

		int ans = 0;
		if (startPlace != endPlace){
			ans = dp(startPlace, 0);
		}

		if (ans<=budget){
			printf("%d\n", ans);
		}
		else{
			printf("Andi tidak bisa mengikuti seminar.\n");
		}

	}

	return 0;
	
}