#include<bits/stdc++.h>
using namespace std;
int main()
{
	int ku;//kasus uji
	int kb;//bayar  
	int kh;// harga 
	int ks; // selisih harga dan bayar
	int ka[100]; // banyaknya koin kasus uji ke
	int i,j;
	int en;
	cin>>ku;
	for(i=1;i<=ku;i++)
	{
		cin>>kb;
		cin>>kh;
		ks=kb-kh;
		ka[i]=0;
		while (ks>0)
		{
			if(ks>=100)
			{
				ks=ks-100;
				ka[i]++;
			}
			else if (ks>=20)
			{
				ks=ks-20;
				ka[i]++;
			}
			else if (ks>=5)
			{
				ks=ks-5;
				ka[i]++;
			}
			else if (ks>=1)
			{
				ks=ks-1;
				ka[i]++;
			}
		}
	}
	for(i=1;i<=ku;i++)
	{
		cout<<ka[i]<<endl;
	}
}
