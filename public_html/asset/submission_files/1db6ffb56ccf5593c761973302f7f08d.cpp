#include <cstdio>
#include <iostream>
#include <cstring>
#include <string>
#include <vector>
#include <algorithm>

using namespace std;

vector<long long> bil;

void buatBil(int sisaDigit, long long currentNumber){

	if (sisaDigit==0){
		bil.push_back(currentNumber);
	}

	else{
		buatBil(sisaDigit-1, (currentNumber*10)+4);
		buatBil(sisaDigit-1, (currentNumber*10)+8);
	}
}

int main(){

	long long n;
	int testcase;

	for (int i=1; i<=17; i++){
		buatBil(i, 0);
	}

	/*printf("size: %d\n", bil.size());
	for (int i=0; i<bil.size(); i++){
		printf("%lld ", bil[i]);
	}
	printf("\n");*/

	sort(bil.begin(), bil.end());

	scanf("%d", &testcase);

	for (int i=0; i<testcase; i++){

		scanf("%lld", &n);

		int kiri = 0;
		int kanan = bil.size()-1;
		long long ans = -1;
		int hitung = (kiri + kanan)/2;

		while (kiri<=kanan){

			hitung = (kiri+kanan)/2;
			if (bil[hitung]>n){
				ans = bil[hitung];
				kanan = hitung-1;
			}
			else if (bil[hitung]<n){
				kiri = hitung+1;
			}
			else {
				ans = bil[hitung];
				break;
			}
		}


		printf("%lld\n", ans);
	}

	return 0;
}