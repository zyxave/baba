#include<iostream>
#include<string>
#include<ctype.h>
using namespace std;

int main()
{
	int tc, n, n2,d;
	// string data[1000];
	// int data[1000];
	cin >> tc;
	
	// keadaan awal padam
	for(int a=1; a<=tc; a++) // jumlah test case
	{
		cin >> n;
		
		for(int b=1; b<=n; b++) // lampu ada berapa
		{
			n2=n;
			for(int c=1; c<=n; n--) // test lampu mati atau nyala
			{
				if(n%b==0) // lampu nyala
				{
					if(b==n2)
					{
						cout << "1";
					}
				}
				
				else // lampu mati
				{
					d=0;
				}
			}
			n=n2;
		}
	}
	// while(b==n2) // menghitung jumlah kata nyala pada baris terakhir
	return 0;
}
