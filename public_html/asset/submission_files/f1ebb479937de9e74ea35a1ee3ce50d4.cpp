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

	for (int i=1; i<=18; i++){
		buatBil(i, 0);
	}

	while(scanf("%lld", &n)!=EOF){

		long long ans;
		for(int i=0; i<bil.size(); i++){
			if (bil[i]>=n){
				ans=bil[i];
				break;
			}	
		}

		printf("%lld\n", ans);
	}

	return 0;
}