#include <cstdio>
#include <cstring>
#include <algorithm>
#include <functional>

using namespace std;

int morning[101];
int afternoon[101];

int main(){

	int n, batas, biaya;
	int totalbiaya;
	int hitung;
	int testcase;

	scanf("%d", &testcase);

	for(int j=0; j<testcase; j++){

		scanf("%d %d %d", &n, &batas, &biaya);
		if (n==0 && batas==0 && biaya==0)
			break;

		totalbiaya = 0;

		for (int i=0; i<n; i++){
			scanf("%d", &morning[i]);
		}

		for (int i=0; i<n; i++){
			scanf("%d", &afternoon[i]);
		}

		sort(morning, morning+n, greater<int>());
		sort(afternoon, afternoon+n);

		for (int i = 0; i < n; i++){
			hitung = (morning[i] + afternoon[i]) - batas;

			if (hitung>0){
				totalbiaya+=(hitung*biaya);
			}
		}

		printf("%d\n", totalbiaya);
	}

	return 0;
}
