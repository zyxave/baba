#include <cstdio>
#include <vector>

using namespace std;

vector<long long> segitigaPascal[26];

void makePascal(){

	segitigaPascal[0].push_back(1);
	segitigaPascal[1].push_back(1);
	segitigaPascal[1].push_back(1);

	for (int i=2; i<26; i++){
		segitigaPascal[i].push_back(1);
		for (int j=0; j<(i-1); j++){
			segitigaPascal[i].push_back(segitigaPascal[i-1][j] + segitigaPascal[i-1][j+1]);
		}
		segitigaPascal[i].push_back(1);
	}
}

long long pangkat(long long a, int b){

	long long ans = 1;

	for (int i=0; i<b; i++){
		ans = ans*a;
	}

	return ans;
}

int main(){

	int testcase;
	long long p, q;

	makePascal();

	scanf("%d", &testcase);

	for (int i=0; i<testcase; i++){

		scanf("%lld %lld", &p, &q);
		
		for (int j=0; j<segitigaPascal[q].size(); j++){

			if (j>0){
				printf(" + ");
			}

			long long koefisien = pangkat(p, j);
			koefisien = koefisien * segitigaPascal[q][j];

			if (koefisien>1 && segitigaPascal[q].size() - j -1 > 0){
				printf("%lld", koefisien);
			}

			else if (koefisien>0 && segitigaPascal[q].size() - j -1 == 0){
				printf("%lld", koefisien);
			}

			if (segitigaPascal[q].size() - j -1 > 1){
				printf("x^%d", segitigaPascal[q].size() - j -1);
			}
			else if (segitigaPascal[q].size() - j -1 == 1){
				printf("x");
			}
		}
		printf("\n");
	}

	return 0;
}