#include <iostream>

using namespace std;
int T,P[10][11];

long int factorial(int l){
	int b = 1;
	for (int d=1;d<(l+1);d++){
		b *= d;
	}
	return b;
}

unsigned long int pangkat (int q,int pangkat){
	int v = q;
	for (int i = 1 ; i < pangkat;i++){
		q *= v;
	}
	return q;
}

long int combinasi(int k,int g){
	int r = factorial(k) / (factorial(k-g)*factorial(g));
	return r;
}

int main(){
	cin >> T;
	for (int k = 0;k<T;k++){
		cin  >> P[k][k] >> P[k][k+1];
	}
	
	for (int p = 0; p<T; p++){
		int po = (P[p][p+1]);
		for (int h = 0;h<(P[p][p+1]+1);h++){
			if (h < (P[p][p+1])){
				if (po >1){
					if (h == 0){

			cout << "x" << po << " ";
			po--;
		}
		else {
			
cout << pangkat(P[p][p],h)*combinasi(P[p][p+1],h) << "x" << po << " ";
po--;		}
		} else {
			cout << pangkat(P[p][p],h)*combinasi(P[p][p+1],h) << "x" << " ";         
		}
		}else {
			cout <<	pangkat(P[p][p],h)*combinasi(P[p][p+1],h) << endl;
		}
	}
	}
	
	return 0;
	
}
