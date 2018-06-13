#include <cstdio>
#include <iostream>
#include <cstring>
#include <string>
#include <vector>

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

	long long ans, n;
	int testcase;

	for (int i=1; i<=5; i++){
		buatBil(i, 0);
	}

	/*
	for (int i=0; i<bil.size(); i++){
		printf("%lld ", bil[i]);
	}
	printf("\n");*/

	scanf("%d", &testcase);

	for (int i=0; i<testcase; i++){

		scanf("%lld", &n);

		long long ans;
		for(int j=0; j<bil.size(); j++){
			if (bil[j]>=n){
				ans=bil[j];
				break;
			}	
		}

		printf("%lld\n", ans);
	}

	return 0;
}